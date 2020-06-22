let tableCase = document.querySelectorAll('td');  
let form = document.querySelector('#element');
let closeBtn = document.getElementById('closeBtn');
let validateButton = document.getElementById('valider');
let MatiereForm = document.getElementById('matiere');
let user_values = {
    cell: null,
    input: null
  };
  closeBtn.addEventListener('click', closeModal);
  tableCase.forEach(function(table_case){
    table_case.addEventListener('click', function(event){
      form.style.visibility = 'visible';
      user_values.cell = event.target;
      
    })
  })

  validateButton.addEventListener('click', function(event){
  user_values.input = MatiereForm.value;
   console.log(user_values);
  form.style.visibility = 'hidden';
   updateCell(user_values.cell, user_values.input);
})


  function updateCell(cell, value){
  cell.textContent = value;
}
  	// Close
		function closeModal() {
      form.style.visibility = 'hidden';
  }

  

