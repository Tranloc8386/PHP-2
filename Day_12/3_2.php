<?php
class Book
{
    private $isbn;
    private $title;
    private $author;
    private $price;
    private $publishYear;
    public function __construct($isbn, $title, $author, $price, $publishYear)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->publishYear = $publishYear;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getPublishyear()
    {
        return $this->publishYear;
    }
    public function getAge()
    {
        return 2025 - $this->publishYear;
    }
    public function isExpensive()
    {
        if ($this->price > 50000) {
            return 1;
        } else  return 0;
    }
}
?>
<?php
$library = [
    new Book("1", "Hoa", "Nguyen Van A", 60000, 2004),
    new Book("2", "Hoang", "Nguyen Van A", 40000, 2006),
    new Book("3", "Quynh", "Nguyen Van A", 20000, 2000),
];
?>

<table border="1">
    <tr>
        <th>ISBN</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th>PRICE</th>
        <th>YEAR</th>
        <th>AGE</th>
        <th>Expensive ?</th>
    </tr>
    <?php foreach ($library as $p) { ?>
        <tr>
            <td> <?php echo $p->getIsbn(); ?></td>
            <td> <?php echo $p->getTitle(); ?></td>
            <td> <?php echo $p->getAuthor(); ?></td>
            <td> <?php echo $p->getPrice(); ?></td>
            <td> <?php echo $p->getPublishyear(); ?></td>
            <td> <?php echo $p->getAge(); ?></td>
            <td><?php echo $p->isExpensive() ?></td>

        </tr>

    <?php } ?>
</table>