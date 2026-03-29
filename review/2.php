<?php
$fruits = ['orange', 'apple', 'cherry'];

foreach($fruits as $p){
    echo "<p> $p</p>";
}
?>

<?php
$price =[
    'apple'=> 1,
    'banana'=> 0.5,
    'cherry'=> 2
];
foreach($price as  $index => $p)
   
    {
         $s= $p*2;
        echo "<p> $index : $s</p>";
    }

?>
