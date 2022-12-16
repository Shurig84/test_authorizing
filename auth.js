$(document).ready(function () {
  $('.auth_btn').click(function (e) {
    e.preventDefault()
    rezet_mes()
    let login = $('input[name="login"]').val(),
      password = $('input[name="password"]').val()
    $.ajax({
      url: '/src/authoriz.php',
      type: 'POST',
      datatype: 'json',
      data: {
        login: login,
        password: password,
        action: 'auth',
      },
      success(data) {
        check(data)
      },
    })
  })
})

$(document).ready(function () {
  $('.update_btn').click(function (e) {
    e.preventDefault()
    rezet_mes()
    let login = $('input[name="login"]').val(),
      password = $('input[name="password"]').val(),
      new_password = $('input[name="new_password"]').val()
    $.ajax({
      url: '/src/authoriz.php',
      type: 'POST',
      datatype: 'json',
      data: {
        login: login,
        password: password,
        new_password: new_password,
        action: 'update',
      },
      success(data) {
        check(data)
      },
    })
  })
})
$(document).ready(function () {
  $('.del_btn').click(function (e) {
    e.preventDefault()
    rezet_mes()
    let login = $('input[name="login"]').val(),
      password = $('input[name="password"]').val()
    $.ajax({
      url: '/src/authoriz.php',
      type: 'POST',
      datatype: 'json',
      data: {
        login: login,
        password: password,
        action: 'del',
      },
      success(data) {
        check(data)
      },
    })
  })
})

function rezet_mes() {
  $('.login_err').text('')
  $('.password_err').text('')
  $('.new_password_err').text('')
  $('.is_del_mess').text('')
  $('.is_update_mess').text('')
}

function check(data) {
  data = JSON.parse(data)
  if (data.update_mes) {
    $('.is_update_mess').text(data.update_mes)
  } else if (data.del_mes) {
    $('.is_del_mess').text(data.del_mes)
  } else if (!data.message) {
    document.location.href = 'reg.php'
  } else if (data.login && data.password) {
    document.cookie = data.name
    document.location.href = 'start.php'
  } else if (data.new_password) {
    $('.new_password_err').text(data.message)
  } else if (data.login && !data.password) {
    $('.password_err').text(data.message)
  } else if (!data.login && !data.password) {
    $('.login_err').text(data.message)
  }
}
