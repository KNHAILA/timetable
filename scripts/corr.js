
function Seance(indice)
{
		var modal = document.getElementById('simpleModal');
		var modalBtn = document.getElementById('t'.concat(indice.toString()));
		var closeBtn = document.getElementById('closeBtn');
		var radio = document.getElementById('heure');
		radio.setAttribute('value',indice);
    	modal.style.display = 'block';
		closeBtn.addEventListener('click', closeModal);
		window.addEventListener('click', outsideClick);

		// Open


		// Close
		function closeModal() {
  			modal.style.display = 'none';
		}

		// Close If Outside Click
		function outsideClick(e) {
  			if (e.target == modal) {
    		modal.style.display = 'none';
  		}
 		}
}

function Seance1(a,b)
{
		var a1=a.toString();
		var b1=b.toString();
		var modal = document.getElementById('simpleModal1');
		var modalBtn = document.getElementById('OK');
		var closeBtn = document.getElementById('closeBtn1');
    	modal.style.display = 'block';
		closeBtn.addEventListener('click', closeModal);
		modalBtn.addEventListener('click', closeModal);
		window.addEventListener('click', outsideClick);
		if(b1!="")
		{
			var p=document.getElementById('1');
			p.appendChild(document.createTextNode("Monsieur "+b.toString()+" n'est pas disponible"));
		}
		if(a1!="")
		{
			var p=document.getElementById('2');
			p.appendChild(document.createTextNode("La salle "+a.toString()+" n'est pas disponible"));
		}

		// Open


		// Close
		function closeModal() {
  			modal.style.display = 'none';
		}

		// Close If Outside Click
		function outsideClick(e) {
  			if (e.target == modal) {
    		modal.style.display = 'none';
  		}
 		}
}

function insere(indice,a,b,c,colr)
{
	var x=document.getElementById(indice);
	var y=document.getElementById('b'+indice.substring(1,3));
	x.removeChild(y);
	var p=document.createElement('p');
	p.appendChild(document.createTextNode('Matiere : '+a));
	x.appendChild(p);
	var p=document.createElement('p');
	p.appendChild(document.createTextNode('Pr.'+c));
	x.appendChild(p);
	var p=document.createElement('p');
	p.appendChild(document.createTextNode('Salle : '+b));
	x.appendChild(p);
	x.style.background =colr ;
}

  function PDF()
  { 
    const doc = jsPDF('p', 'pt', 'a4');
    doc.setDrawColor(255,0,0);
    doc.addHTML(document.getElementById('table'), function () {doc.save("test.pdf")})
    /*var doc = new jsPDF();

        doc.addHTML(document.getElementById('table'), function () {
            doc.save('love.pdf');
            alert("Downloaded!");

        });*/
   
  }

  