sampleCode
==========

 A PHP web application that accepts requests with a path argument or variable for an integer.
 Then returns a JSON object that contains an array property of the next 5 integers which are NOT divisible by 3,
 and a string property with a unique identifier for the request.
 Also send a javascript file that makes an AJAX request to the PHP app and injects the array form the response into a HTML DOM as a unnumbered list.