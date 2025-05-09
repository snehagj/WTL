<!DOCTYPE html>
<html>
<body>

<?php
echo "<h2>Array Functions</h2>";

$arr = array(10, 20, 30, 40, 50);

echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($arr);
echo "</pre>";

// 1. count()
echo "<br><strong>1. Count:</strong> " . count($arr);

// 2. array_sum()
echo "<br><strong>2. Sum:</strong> " . array_sum($arr);

// 3. array_reverse()
echo "<br><strong>3. Reverse:</strong>";
echo "<pre>";
print_r(array_reverse($arr));
echo "</pre>";

// 4. sort()
echo "<br><strong>4. Sorted:</strong>";
sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";

// 5. array_search()
$searchResult = array_search(30, $arr);
echo "<br><strong>5. Array Search (30):</strong> " . ($searchResult !== false ? $searchResult : "Not Found");

// 6. in_array()
echo "<br><strong>6. In Array (40):</strong> " . (in_array(40, $arr) ? 'Yes' : 'No');

// 7. array_push()
array_push($arr, 60);
echo "<br><strong>7. After Push (60):</strong>";
echo "<pre>";
print_r($arr);
echo "</pre>";

// 8. array_pop()
$popped = array_pop($arr);
echo "<br><strong>8. Popped Element:</strong> $popped <br><strong>Array after pop:</strong>";
echo "<pre>";
print_r($arr);
echo "</pre>";

// 9. array_merge()
$extra = array(70, 80);
$merged = array_merge($arr, $extra);
echo "<br><strong>9. Merged Array:</strong>";
echo "<pre>";
print_r($merged);
echo "</pre>";

// 10. array_unique()
$dupArray = array(10, 20, 20, 30, 30, 40);
$unique = array_unique($dupArray);
echo "<br><strong>10. Unique Elements:</strong>";
echo "<pre>";
print_r($unique);
echo "</pre>";
?>

</body>
</html>