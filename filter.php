<?php
session_start();
include_once '../includes/header.php';
include_once '../includes/functions.php';

$cars = json_decode(file_get_contents('../data/cars.json'), true);
$filters = $_GET;

if (!empty($filters)) {
    $cars = filterCars($cars, $filters);
}
?>

<h1>Available Cars</h1>
<form method="GET">
    <label>Transmission:
        <select name="transmission">
            <option value="">All</option>
            <option value="Automatic">Automatic</option>
            <option value="Manual">Manual</option>
        </select>
    </label>
    
    <label>Passengers:
        <input type="number" name="passengers" min="1">
    </label>
    <label>Min Price:
        <input type="number" name="price_min" min="0">
    </label>
    <label>Max Price:
        <input type="number" name="price_max" min="0">
    </label>
    <button type="submit">Filter</button>
</form>

<div>
    <?php foreach ($cars as $car): ?>
        <div>
            <img src="<?= $car['image'] ?>" alt="<?= $car['model'] ?>">
            <p><?= $car['brand'] . ' ' . $car['model'] ?></p>
            <p>Price: <?= $car['daily_price_huf'] ?> HUF/day</p>
            <a href="details.php?id=<?= $car['id'] ?>">Details</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include '../includes/footer.php'; ?>
