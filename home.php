<?php
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
            <option value="Automatic" <?= isset($filters['transmission']) && $filters['transmission'] == 'Automatic' ? 'selected' : '' ?>>Automatic</option>
            <option value="Manual" <?= isset($filters['transmission']) && $filters['transmission'] == 'Manual' ? 'selected' : '' ?>>Manual</option>
        </select>
    </label>
    <label>Passengers:
        <input type="number" name="passengers" value="<?= isset($filters['passengers']) ? htmlspecialchars($filters['passengers']) : '' ?>" min="1">
    </label>
    <label>Min Price:
        <input type="number" name="price_min" value="<?= isset($filters['price_min']) ? htmlspecialchars($filters['price_min']) : '' ?>" min="0">
    </label>
    <label>Max Price:
        <input type="number" name="price_max" value="<?= isset($filters['price_max']) ? htmlspecialchars($filters['price_max']) : '' ?>" min="0">
    </label>
    <button type="submit">Filter</button>
</form>

<div>
    <?php if (!empty($cars)): ?>
        <?php foreach ($cars as $car): ?>
            <div>
                <img src="<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['model']) ?>">
                <p><?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?></p>
                <p>Price: <?= htmlspecialchars($car['daily_price_huf']) ?> HUF/day</p>
                <a href="details.php?id=<?= htmlspecialchars($car['id']) ?>">Details</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No cars match your filters. Please try adjusting the filters.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
