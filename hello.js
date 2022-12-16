$(document).ready(function () {
  $('.user_name').text('')
  $('.user_email').text('')
  $('.user_login').text('')
  $.ajax({
    url: '/src/hello.php',
    type: 'POST',
    datatype: 'json',
    data: {
      action: 'hello',
    },
    success(data) {
      data = JSON.parse(data)
      $('.user_name').text(data.name)
      $('.user_email').text(data.email)
      $('.user_login').text(data.login)
    },
  })
})
