Create a new file "Lab4_your-user-name.php" and copy into it the HTML from the following file: 12days.html.
Now download the 12days.css file and 13 image files that you will need. They can be found in this file: Lab4AuxFiles.zip. Download this file, unzip it, and put its contents in the same directory as your Lab4_your-user-name.php file. You should not need to modify any of these extra files.
Your HTML page already has the correct appearance, but the code is long and redundant and the middle part has been omitted. Your job is to modify the page to use PHP code to remove this redundancy.
Notice the following aspects of the page that you should address in your PHP code:
There is an overall pattern to each day and the gift(s) that are given on that day.
Each day's gift is displayed with an image from a file with a name such as gift1.jpg, gift2.jpg, ..., gift12.jpg.
Each day has an initial heading such as, "On the 1st day of Christmas my true love gave to me ..."
Each day's gift has a unique description such as "Three French hens" that should be displayed underneath the images for that gift.
There are some stylistic aspects of your PHP code that you should be careful about:
You should minimize the use of print/echo statements and you should never use them to print any HTML tags.
Your PHP code should be formatted nicely so that it is readable and the HTML it generates should be formatted nicely so that, if the user chooses to View Source in the browser, the source output will be readable.
More generally, the more elegant your source (i.e., readable, simple, and avoids duplication, etc.), the better your grade.
My solution reduces the source HTML and PHP for the div with id "box" to only 32 lines, and many of those lines have just a single token such as "?>" on them. There are also 22 lines of PHP code in the head section of the HTML page.
Try to find a way in your PHP code to elegantly represent the gift descriptions, such as "three French hens", without lots of repeated text, code, or if/else statements.