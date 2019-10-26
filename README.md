# stegleak - project
Facial Recognition and Steganography 
This project was created to give a means to track the distribution of images from unauthorized sources. Where by you have the images in a gallery on your webserver and upon being viewed metadata of your choosing is encoded into the outgoing PNG image to the browser. 
It works by using facial recognition to establish a bounding box region around the detected face in which the secret metadata is encoded into this region via least significant bit (LSB) encoding steganography method. Later images found in the wild can be recovered and if the facial bounding box region is still intact recovery of the secret metadata can be achieved, which can aid in determinging who, when, where, what login etc may have taken and shared the image.

![Before & After](/face_debug.png)

## face_debug.php - Debug Facial Recognition
Load image from disk and detect face and establish the bounding box around face.

```
$detector = new Face_Steg('detection.dat',5);
$detector->face_detect('Estella_01.png');
$detector->toPNG();
```

![Before & After](/normal_encoded.png)
## face_encode.php - Facial Recognition and encode message into face using LSB

```
$detector = new Face_Steg('detection.dat',5);
$detector->face_detect('Estella_01.png');
$detector->toStegPNG('secret message'); 
// Encryption can be added before going into toStegPNG can easily Base64(AES(message,key)) and encode that base64 string.
```
## face_decode.php - Facial Recognition and decode message from already encoded image on disk

```
$detector = new Face_Steg('detection.dat',5);
$detector->face_detect('Encoded_01.png');
echo "Decoded MSG: " . $detector->toStegMSG() . "\n";
```
