<?php 
$studentName ="Nguyen van a";
$studentAge ='20';
$studentYear= '2';

echo "<p>My name is $studentName, I am $studentAge years old, and I am in year $studentYear of my studies.</p>";

function calculateCircleArea($radius) {
    return M_PI * pow($radius, 2);
}
$radius = 7.5;
$area = calculateCircleArea($radius);

echo "The area of the circle with radius $radius is: $area";
?>
