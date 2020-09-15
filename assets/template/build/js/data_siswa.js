const keyword = document.getElementById('keyword');
const tbody = document.getElementById('tbody');

keyword.addEventListener('keyup', async function () {
	if (keyword.value == '') {
		location.href = 'http://localhost/sekolahku/welcome/dataSiswa';
	}
	const siswa = await getData(keyword.value)
	render(siswa)
})

async function getData(keyword) {
	return fetch('http://localhost/sekolahku/welcome/getSiswaAktifJson?keyword=' + keyword)
		.then(response => response.json()).then(response => response)

}

function render(siswa) {
	let html = '';
	let i = 0;
	siswa.forEach(data => {
		const segment = `
      <tr>
      <th scope="row" class="text-center">${i+=1}</th>
      <td class="text-center">${data.nama_siswa}</td>
      <td class="text-center">${data.gender_siswa}</td>
      <td class="text-center">${data.tahun_ajaran}</td>
    </tr>
    `
		html += segment
	});
	return tbody.innerHTML = html
}
