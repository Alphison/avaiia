import Storage from '@/services/Storage'
import { v4 as uuidv4 } from 'uuid'

export function cookies () {
  const cookiesBanner = document.querySelector('.cookies')

  if (!cookiesBanner) return false

  if (!Storage.get('cookiesAccept')) cookiesBanner.classList.add('active')

  if (!getCookie('browser_session')) setCookie('browser_session', uuidv4(),365)

  cookiesBanner.addEventListener('click', (ev) => {
    if (ev.target.classList.contains('cookiesAccept')) {
      cookiesBanner.classList.remove('active')
      localStorage.setItem('cookiesAccept', JSON.stringify(true))
    }

    if (ev.target.classList.contains('cookiesReject')) {
      cookiesBanner.classList.remove('active')
      localStorage.setItem('cookiesAccept', JSON.stringify(false))

    }

    ev.preventDefault()
  })
}

function setCookie (name, value, days) {
  var expires = ''
  if (days) {
    let date = new Date()
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
    expires = '; expires=' + date.toUTCString()
  }
  document.cookie = name + '=' + (value || '') + expires + '; path=/'
}

function getCookie (name) {
  const nameEQ = name + '='
  const ca = document.cookie.split(';')
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i]
    while (c.charAt(0) === ' ') c = c.substring(1, c.length)
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length)
  }
  return null
}
