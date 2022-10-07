<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Cetak Hasil Penilaian</title>

	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			font-size: 14px;
		}

		th {
			height: 30px;
			text-align: center;
		}

		table,
		th,
		td {
			border: 1px solid black;
		}

		th,
		td {
			padding: 3px;
		}

		thead {
			background: lightgray;
		}

		.center {
			text-align: center;
		}
	</style>
</head>

<body>
	<h2 class="center">HASIL PENILAIAN METODE SAW</h2>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Alternatif</th>
				<th>Nilai</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			foreach ($hasil as $row) : ?>
				<tr>
					<td class="center"><?= ++$no ?></td>
					<td><?= $row->nama_alternatif ?></td>
					<td class="center"><?= floatval($row->nilai) ?></td>
					<td class="center"><?= $row->keterangan ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<h3 class="page-header">Tabel Persentase</h3>
								<div class='table-responsive'>
									<table class='table table-bordered'>
										<thead>
											<tr>
												<th>Keterangan</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($kelompok)) : ?>
												<?php $i = 1; ?>
												<?php foreach ($kelompok as $row) : ?>
													<tr>
														<td><?php echo $row['label']; ?></td>
														<td><?php echo $row['value']; ?> %</td>
													</tr>
													<?php $i++; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
</body>

</html>