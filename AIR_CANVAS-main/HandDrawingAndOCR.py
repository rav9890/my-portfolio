import cv2
import numpy as np
import time
import os
import pytesseract  
import HandTrackingModule as htm

#######################
brushThickness = 25
eraserThickness = 300
canvasWidth, canvasHeight = 1280, 720  # Initial canvas size
resizeHandleSize = 20
resizeDragging = False
resizeHandle = (canvasWidth - resizeHandleSize, canvasHeight - resizeHandleSize)  # Bottom-right corner
########################
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR'
folderPath = "Header"
myList = os.listdir(folderPath)
print(myList)
overlayList = []
for imPath in myList:
    image = cv2.imread(f'{folderPath}/{imPath}')
    overlayList.append(image)
print(len(overlayList))
header = overlayList[0]
drawColor = (255, 0, 255)

cap = cv2.VideoCapture(0)
if not cap.isOpened():
    print("Error: Camera could not be opened.")
    exit()

cap.set(3, canvasWidth)
cap.set(4, canvasHeight)

detector = htm.handDetector(detectionCon=0.65, maxHands=1)
xp, yp = 0, 0
imgCanvas = np.zeros((canvasHeight, canvasWidth, 3), np.uint8)

img_counter = 0
screenshot_interval = 30
start_time = time.time()

# Flag to detect mode change
selectionMode = False
parallel_display = False  # Flag for split-screen layout toggle

def draw_resize_handle(img):
    """ Draws a resize handle on the image. """
    global resizeHandle
    cv2.rectangle(img, resizeHandle, (resizeHandle[0] + resizeHandleSize, resizeHandle[1] + resizeHandleSize), (0, 255, 255), cv2.FILLED)
    cv2.putText(img, "Resize", (resizeHandle[0] + 5, resizeHandle[1] + resizeHandleSize // 2), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 0), 1)

while True:
    success, img = cap.read()
    if not success:
        print("Failed to grab frame")
        break

    img = cv2.flip(img, 1)

    img = detector.findHands(img)
    lmList, bbox = detector.findPosition(img, draw=False)

    # Draw buttons and resize handle


    cv2.rectangle(img, (50, 150), (200, 200), (255, 255, 255), cv2.FILLED)  # "-" button for brush size decrease
    cv2.putText(img, "Smaller", (60, 190), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 0), 2)

    # Draw a button to increase brush size more rapidly
    cv2.rectangle(img, (50, 250), (200, 300), (0, 255, 0), cv2.FILLED)  # "Increase Size" button
    cv2.putText(img, "Larger", (60, 290), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 0), 2)

    draw_resize_handle(img)

    if len(lmList) > 8:
        x1, y1 = lmList[8][1:]
        x2, y2 = lmList[12][1:]

        fingers = detector.fingersUp()

        # Brush Thickness Adjustments
        if 50 < x1 < 100 and 50 < y1 < 100:  # "+" button
            if fingers[1] and not fingers[2]:  # Check if user clicks "+"
                brushThickness += 5  # Increase brush thickness

        if 50 < x1 < 100 and 150 < y1 < 200:  # "-" button
            if fingers[1] and not fingers[2]:  # Check if user clicks "-"
                brushThickness = max(5, brushThickness - 5)  # Decrease brush thickness

        # Rapid Brush Increase Button
        if 50 < x1 < 200 and 250 < y1 < 300:  # "Larger" button
            if fingers[1] and not fingers[2]:  # Check if user clicks "Larger"
                brushThickness += 10  # Increase brush thickness more significantly

        # Handle Resize Interaction
        if (resizeHandle[0] < x1 < resizeHandle[0] + resizeHandleSize and
            resizeHandle[1] < y1 < resizeHandle[1] + resizeHandleSize):
            resizeDragging = True
            if fingers[1] and fingers[2]:  # If user is dragging with two fingers
                new_width = max(400, x1)  # Minimum width
                new_height = max(300, y1)  # Minimum height
                canvasWidth = new_width
                canvasHeight = new_height
                imgCanvas = np.zeros((canvasHeight, canvasWidth, 3), np.uint8)
                cap.set(3, canvasWidth)
                cap.set(4, canvasHeight)
                resizeHandle = (canvasWidth - resizeHandleSize, canvasHeight - resizeHandleSize)
        else:
            resizeDragging = False

        # Toggle Parallel Display Mode
        if 50 < x1 < 100 and 350 < y1 < 400:  # "Toggle Layout" button
            if fingers[1] and not fingers[2]:  # Check if user clicks "Toggle Layout"
                parallel_display = not parallel_display
                print(f"Parallel Display Mode: {'On' if parallel_display else 'Off'}")

        if fingers[1] and fingers[2]:
            selectionMode = True  # Enable selection mode
            xp, yp = 0, 0  # Reset coordinates when in selection mode
            print("Selection Mode")
            if y1 < 125:
                if 250 < x1 < 450:
                    header = overlayList[0]
                    drawColor = (255, 0, 255)  # Purple
                elif 550 < x1 < 750:
                    header = overlayList[1]
                    drawColor = (255, 100, 0)  # Corrected Blue (BGR)
                elif 800 < x1 < 950:
                    header = overlayList[2]
                    drawColor = (0, 255, 0)  # Green
                elif 1050 < x1 < 1200:
                    header = overlayList[3]
                    drawColor = (0, 0, 0)  # Eraser (Black)
            cv2.rectangle(img, (x1, y1 - 25), (x2, y2 + 25), drawColor, cv2.FILLED)

        if fingers[1] and not fingers[2]:
            if selectionMode:  # Reset coordinates if switching from selection mode
                xp, yp = 0, 0
                selectionMode = False  # Reset flag after switching mode

            cv2.circle(img, (x1, y1), 15, drawColor, cv2.FILLED)
            if xp == 0 and yp == 0:
                xp, yp = x1, y1

            cv2.line(img, (xp, yp), (x1, y1), drawColor, brushThickness)
            cv2.line(imgCanvas, (xp, yp), (x1, y1), drawColor, brushThickness)
            xp, yp = x1, y1

    imgGray = cv2.cvtColor(imgCanvas, cv2.COLOR_BGR2GRAY)
    _, imgInv = cv2.threshold(imgGray, 50, 255, cv2.THRESH_BINARY_INV)
    imgInv = cv2.cvtColor(imgInv, cv2.COLOR_GRAY2BGR)
    img = cv2.bitwise_and(img, imgInv)
    img = cv2.bitwise_or(img, imgCanvas)

    if parallel_display:
        img = np.concatenate((img, imgCanvas), axis=1)  # Side-by-side layout
    else:
        img[0:125, 0:canvasWidth] = header  # Standard layout with header at the top

    cv2.imshow("Image", img)
    cv2.imshow("Canvas", imgCanvas)

    elapsed_time = time.time() - start_time
    if elapsed_time > screenshot_interval:
        img_name = f"opencv_frame_{img_counter}.png"

        cv2.imwrite(img_name, img)
        print(f"Screenshot taken: {img_name}")

        try:
            gray_frame = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

            # Apply additional preprocessing for OCR
            _, thresh = cv2.threshold(imgInv, 127, 255, cv2.THRESH_BINARY)
            text = pytesseract.image_to_string(thresh, config='--psm 8')

            print(f"Extracted Text: {text}")

            if text.strip() == "":
                print("No text detected in the image.")

            with open(f"text_output_{img_counter}.txt", "w") as file:
                file.write(text)
            print(f"Text extracted and saved to text_output_{img_counter}.txt")
        except Exception as e:
            print(f"Error with OCR: {e}")

        img_counter += 1
        start_time = time.time()

    k = cv2.waitKey(1)
    if k % 256 == 27:  # ESC key
        print("Escape key is pressed")
        break
    elif k % 256 == 32:  # SPACE key
        img_name = f"opencv_frame_{img_counter}.png"
        cv2.imwrite(img_name, img)
        print(f"Screenshot taken: {img_name}")

        try:
            gray_frame = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
            _, thresh = cv2.threshold(gray_frame, 127, 255, cv2.THRESH_BINARY)
            text = pytesseract.image_to_string(thresh, config='--psm 6')

            print(f"Extracted Text: {text}")

            if text.strip() == "":
                print("No text detected in the image.")

            with open(f"text_output_{img_counter}.txt", "w") as file:
                file.write(text)
            print(f"Text extracted and saved to text_output_{img_counter}.txt")
        except Exception as e:
            print(f"Error with OCR: {e}")

        img_counter += 1

cap.release()
cv2.destroyAllWindows()
