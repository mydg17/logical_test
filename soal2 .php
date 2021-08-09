SELECT mhs_nama,MAX(nilai),mk_kode
FROM tb_mahasiswa AS mhs
LEFT JOIN tb_mahasiswa_nilai AS nilai ON
	nilai.mhs_id = mhs.mhs_id
LEFT JOIN tb_matakuliah AS makul ON
	makul.mk_id = nilai.mk_id
WHERE makul.mk_kode = 'MK303'
GROUP BY makul.mk_kode