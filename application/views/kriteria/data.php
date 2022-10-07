<?php $this->load->view('template/header'); ?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Data Kriteria</h3>
		<div class="button-right">
			<a href="<?php echo site_url('kriteria/tambah'); ?>" class="btn btn-primary">Tambah Kriteria</a>
		</div>
	</div>
	<div class="box-body">
		<p style="font-size: 13px; color: red; display: none;" id="bobot-text">jumlah bobot maksimal = 1. silakan cek kembali bobotnya</p>
		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="dataTables1">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Kriteria</th>
						<th>Nama Kriteria</th>
						<th>Bobot</th>
						<th>Tipe</th>
						<th width="180">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $row) { ?>
						<tr>
							<td></td>
							<td><?php echo $row->kode_kriteria; ?></td>
							<td><?php echo $row->nama_kriteria; ?></td>
							<td class="td-bobot"><?php echo $row->bobot; ?></td>
							<td><?php echo $row->tipe; ?></td>
							<td>
								<a href="<?php echo site_url('kriteria/ubah/' . $row->id_kriteria); ?>" class="btn btn-success btn-xs" title="Ubah">Ubah</a> &nbsp;
								<a href="#" data-href="<?php echo site_url('kriteria/hapus/' . $row->id_kriteria); ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
								<a href="<?php echo site_url('subkriteria/' . $row->id_kriteria); ?>" class="btn btn-info btn-xs">Subkriteria</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function cekBobot() {
		const elements = Array.from(document.getElementsByClassName("td-bobot"));
		let bobot = 0;
		for (const element of elements) {
			bobot = parseFloat(element.textContent) + bobot;
		}
		if (bobot == 1) {
			document.getElementById('bobot-text').style.display = 'none'
		} else {
			document.getElementById('bobot-text').style.display = 'block'
		}
	}
	cekBobot()
</script>

<?php $this->load->view('template/footer'); ?>