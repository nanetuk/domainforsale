// Disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        event.preventDefault()
        event.stopPropagation()

        if(form.checkValidity()) {
          // Recaptcha
          grecaptcha.ready(function() {
            grecaptcha.execute('6LfpBh4aAAAAADDoqA8SOs_2stcqaQqGw4PJppoN', {action: 'submit'}).then(function(token) {
              form.submit();
            })
          })
        }

        form.classList.add('was-validated')
      }, false)
    })
})()