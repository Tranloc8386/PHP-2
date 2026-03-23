<?php
class Student
{
    private $id;
    private $name;
    private $age;
    private $grade;

    public function __construct($id, $name, $age, $grade)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;

        $this->grade = $grade;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getGrade()
    {
        return $this->grade;
    }

    public function getRank()
    {
        if ($this->grade >= 8) {
            return "Gioi";
        } elseif ($this->grade >= 6.5) {
            return "Kha";
        } elseif ($this->grade >= 5) {
            return "Trung Binh";
        } else {
            return "Khong hop le";
        }
    }
}
?>
<?php
$students = [
    new Student("SV01", "Nguyen Van A", 20, 8.5),
    new Student("SV02", "Tran Van B", 21, 7.8),
    new Student("SV03", "Le Thi C", 19, 9.2),
    new Student("SV04", "Pham Van D", 22, 6.0)
];
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Grade</th>
        <th>Rank</th>

    </tr>
    <?php foreach ($students as $student) { ?>
        <tr>
            <td> <?php echo $student->getId() ?></td>
            <td> <?php echo $student->getName() ?></td>
            <td> <?php echo $student->getAge() ?></td>
            <td> <?php echo $student->getGrade() ?></td>
            <td> <?php echo $student->getRank() ?></td>


        </tr>

    <?php } ?>
</table>