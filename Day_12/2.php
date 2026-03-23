<?php
$cities = ['HA NOi', 'HO CHI MINH', 'VINH', 'DA NANG', 'HAI PHONG'];
foreach ($cities as $city) {
    echo "<li>$city</li>";
}

$scores = [
    'Math' => 8.5,
    'Physics' => 7.0,
    'English' => 9.2,
    'History' => 6.8
];

foreach ($scores as $subject => $score) {

    $newscore = $score + 0.5;
    if ($newscore > 10) {
        $newscore = 10;
    }
    $scores[$subject] = $newscore;
}

echo "<p>Diem sau khi cong 0.5 <br></p>";

$students = [
    [
        'id' => 'SV01',
        'name' => 'Nguyen Van A',
        'age' => 20,
        'grade' => 10
    ],
    [
        'id' => 'SV02',
        'name' => 'Nguyen Van b',
        'age' => 22,
        'grade' => 8.5
    ],
    [
        'id' => 'SV03',
        'name' => 'Nguyen Van C',
        'age' => 24,
        'grade' => 9
    ],
]
?>
<table border="1">
    <tr>
        <th>Subject</th>
        <th>New score</th>

    </tr>
    <?php foreach ($scores as $subject => $score) { ?>
        <tr>
            <td><?php echo $subject ?></td>
            <td><?php echo $score ?></td>
        </tr>


    <?php } ?>
</table>
<table border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Grade</th>
    </tr>
    <?php foreach($students as $student) { ?>
    <tr>
        <td><?php echo $student['id'] ?></td>
        <td><?php echo $student['name'] ?></td>
        <td><?php echo $student['age'] ?></td>
        <td><?php echo $student['grade'] ?></td>

    </tr>

    <?php } ?>
</table>