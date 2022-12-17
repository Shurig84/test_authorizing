$('.reg_btn').click(function (e) {
  e.preventDefault()
  $('.name_err').text('')
  $('.login_err').text('')
  $('.email_err').text('')
  $('.password_err').text('')
  $('.confirm_password_err').text('')
  let name = $('input[name="name"]').val(),
    login = $('input[name="login"]').val(),
    email = $('input[name="email"]').val(),
    password = $('input[name="password"]').val(),
    confirm_password = $('input[name="confirm_password"]').val()

  $.ajax({
    //отравка запроса на регистрацию профиля
    url: '/src/entry.php',
    type: 'POST',
    datatype: 'json',
    data: {
      name: name,
      email: email,
      login: login,
      password: password,
      confirm_password: confirm_password,
    },
    success(data) {
      data = JSON.parse(data)

      if (data.all_valid) document.location.href = 'start.php'
      else {
        if (!data.name) $('.name_err').text('ошибка ввода имени')

        if (!data.email) $('.email_err').text(data.email_mess)

        if (!data.login) $('.login_err').text(data.login_mess)

        if (!data.password) $('.password_err').text('ошибка ввода пароля')

        if (!data.confirm_password)
          $('.confirm_password_err').text('Пароли не совпадают')
      }
    },
  })
})
