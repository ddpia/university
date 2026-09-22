<?php

$dayNumber = (int) date('N');
$dayNames = [
	1 => 'понедельник',
	2 => 'вторник',
	3 => 'среда',
	4 => 'четверг',
	5 => 'пятница',
	6 => 'суббота',
	7 => 'воскресенье',
];

$johnSchedule = in_array($dayNumber, [1, 3, 5], true)
	? '8:00-12:00'
	: 'Нерабочий день';
$janeSchedule = in_array($dayNumber, [2, 4, 6], true)
	? '12:00-16:00'
	: 'Нерабочий день';

$forSteps = [];
$a = 0;
$b = 0;

for ($i = 0; $i <= 5; $i++) {
	$a += 10;
	$b += 5;
	$forSteps[] = ['step' => $i, 'a' => $a, 'b' => $b];
}

$whileSteps = [];
$a = 0;
$b = 0;
$i = 0;

while ($i <= 5) {
	$a += 10;
	$b += 5;
	$whileSteps[] = ['step' => $i, 'a' => $a, 'b' => $b];
	$i++;
}

$doWhileSteps = [];
$a = 0;
$b = 0;
$i = 0;

do {
	$a += 10;
	$b += 5;
	$doWhileSteps[] = ['step' => $i, 'a' => $a, 'b' => $b];
	$i++;
} while ($i <= 5);

function renderStepsTable(array $steps): string
{
	$html = '<table>';
	$html .= '<thead><tr><th>Шаг</th><th>a</th><th>b</th></tr></thead><tbody>';

	foreach ($steps as $step) {
		$html .= '<tr>';
		$html .= '<td>' . $step['step'] . '</td>';
		$html .= '<td>' . $step['a'] . '</td>';
		$html .= '<td>' . $step['b'] . '</td>';
		$html .= '</tr>';
	}

	return $html . '</tbody></table>';
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Лабораторная работа №3</title>
	<style>
		body { font-family: Arial, sans-serif; line-height: 1.5; margin: 2rem auto; max-width: 900px; padding: 0 1rem; }
		table { border-collapse: collapse; margin: 1rem 0 2rem; width: 100%; }
		th, td { border: 1px solid #999; padding: 0.5rem; text-align: left; }
		th { background: #f0f0f0; }
		h1, h2 { color: #222; }
	</style>
</head>
<body>
	<h1>Лабораторная работа №3. Управляющие конструкции</h1>

	<h2>Условные конструкции</h2>
	<p>Сегодня: <?= htmlspecialchars($dayNames[$dayNumber], ENT_QUOTES, 'UTF-8') ?>.</p>
	<table>
		<thead>
			<tr>
				<th>№</th>
				<th>Фамилия Имя</th>
				<th>График работы</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>John Styles</td>
				<td><?= htmlspecialchars($johnSchedule, ENT_QUOTES, 'UTF-8') ?></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jane Doe</td>
				<td><?= htmlspecialchars($janeSchedule, ENT_QUOTES, 'UTF-8') ?></td>
			</tr>
		</tbody>
	</table>

	<h2>Цикл for</h2>
	<?= renderStepsTable($forSteps) ?>
	<p>End of the loop: a = 60, b = 30</p>

	<h2>Цикл while</h2>
	<?= renderStepsTable($whileSteps) ?>
	<p>End of the loop: a = 60, b = 30</p>

	<h2>Цикл do-while</h2>
	<?= renderStepsTable($doWhileSteps) ?>
	<p>End of the loop: a = 60, b = 30</p>
</body>
</html>
