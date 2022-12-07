// let calendar = flatpickr('#search-day', {
//   altInput: true,
//   altFormat: 'F j, Y',
//   dateFormat: 'Y-m-d',
//   minDate: 'today',
//   locale: 'de', // locale for this instance only
// })

const inputLocation = document.querySelector('#location-input'),
  inputServices = document.querySelector('#services-input'),
  inputDate = document.querySelector('#search-day'),
  modalServices = document.querySelector('#modal-services'),
  modalLocation = document.querySelector('#modal-location'),
  modalAlert = document.querySelector('#modal-danger')
const modalOverlay = document.querySelector('.modal-overlay')
const infoLocationCart = document.querySelector('.cart .destination .info')

const cartForm = document.querySelector('.cart form')
const cartContainer = document.querySelector('.services-container')
let slashes = ''

// console.log(infoLocationCart)

// console.log(serviceList, locationList)

function limit(string = '', limit = 0) {
  return string.substring(0, limit)
}

import suggestions from './suggestionsLocation.js'

if (modalOverlay) {
  /** global function(s) */

  function suggestionsSearchLocation() {
    const searchInput = modalLocation.querySelector('#name')
    let slash
    if (document.querySelector('main#home')) {
      slash = '../'
    } else {
      slash = '../../'
    }
    searchInput.addEventListener('keyup', async (e) => {
      let value = e.target.value
      if (value !== '') {
        modalLocation.querySelector('.research').style.display = 'none'
        let results = await suggestions(value, slash)
        // console.log(results)
        let list = []
        if (results.length > 0) {
          results
            .map((result) => {
              let { name, state } = result
              list += `
            <span data-location="${name} ${state}">
            <i class="fa-solid fa-location-dot"></i>${name} ${state}</span>
            `
            })
            .join('')
          locationList.innerHTML = `
            <div class="list">
            ${list}
            </div>
            `
        } else {
          locationList.innerHTML = `
          <p class="error">
          We couldn't find any matches. Try checking the spelling and search
          again.
        </p>
              `
        }
      } else {
        locationList.innerHTML = ``
        modalLocation.querySelector('.research').style.display = 'block'
      }
    })
  }

  const locationList = modalLocation.querySelector('.list')
  const serviceList = modalServices.querySelector('.list')
  const services = [...serviceList.querySelectorAll('input')]
  const btn = serviceList.parentElement.querySelector('.btn')
  /******************** for search form ***********************/
  if (inputLocation) {
    inputServices.addEventListener('click', () => {
      modalServices.classList.add('show')
    })
    inputLocation.addEventListener('click', () => {
      modalLocation.classList.add('show')
      suggestionsSearchLocation()
    })

    /*** for input date */
    inputDate.addEventListener('input', () => {
      if (inputDate.value) {
        const clearBtn = inputDate.parentElement.querySelector('i:nth-child(2)')
        // console.log(closeBtn)
        clearBtn.style.display = 'block'
        sessionStorage.setItem('date', inputDate.value)

        clearBtn.addEventListener('click', () => {
          // inputDate.value = ''
          // calendar.clear()
          clearBtn.style.display = 'none'
        })
      }
    })

    /* getting values to add it on search form */
    // for location
    locationList.addEventListener('click', (e) => {
      // console.log(e.target)
      if (e.target.hasAttribute('data-location')) {
        let location = e.target.dataset.location
        // console.log(location)

        if (location.length > 20) {
          location = limit(location, 20).concat('...')
        }
        inputLocation.value = location
        sessionStorage.setItem('location', location)
        if (inputLocation.value != '') {
          modalLocation.classList.remove('show')
          const clearBtn = inputLocation.parentElement.querySelector('i:nth-child(2)')
          clearBtn.style.display = 'block'
          clearBtn.addEventListener('click', () => {
            inputLocation.value = ''
            clearBtn.style.display = 'none'
          })
        }
      }
    })
    // for services
    btn.addEventListener('click', () => {
      let checkedList = [...new Set()]
      let values = []

      services.forEach((service) => {
        if (service.checked) {
          checkedList.push(service.value)
          values = checkedList.join(', ')
          console.log(values)
        }
      })
      modalServices.classList.remove('show')
      if (values != '') {
        if (values.length > 25) {
          values = limit(values, 25).concat('...')
          console.log(values)
        }
        inputServices.value = values
        sessionStorage.setItem('services', values)
        const clearBtn = inputServices.parentElement.querySelector('i:nth-child(2)')
        clearBtn.style.display = 'block'
        clearBtn.addEventListener('click', () => {
          inputServices.value = ''
          clearBtn.style.display = 'none'
          services.forEach((service) => {
            if (service.checked) {
              service.checked = false
            }
          })
        })
      } else {
        inputServices.value = ''
      }
    })
  }
  modalServices.querySelector('.close').addEventListener('click', () => {
    modalServices.classList.remove('show')
  })

  modalLocation.querySelector('.close').addEventListener('click', () => {
    modalLocation.classList.remove('show')
  })
  modalAlert.querySelector('.close').addEventListener('click', () => {
    modalAlert.classList.remove('show')
  })

  //for check or services box modal

  let serviceValues = sessionStorage.getItem('services')
  if (serviceValues !== null && serviceValues) {
    serviceValues = serviceValues.split(',') // convert to array

    serviceValues = serviceValues.map((element) => {
      return element.trim()
    })

    services.forEach((checkbox) => {
      if (serviceValues.includes(checkbox.value)) {
        checkbox.checked = true
      }
      // console.log(checkbox)
    })
  }

  /************************************* for card form ***************************/

  const destinationBtn = document.querySelector('#destination-btn')
  const alertContainer = document.querySelector('.alert-section-cart')
  const alertText = document.querySelector('.alert-section-cart p')
  const alertbutton = document.querySelector('.alert-section-cart button')
  // console.log(alertText)

  if (destinationBtn) {
    // console.log('okooooo')
    let user_id = cartContainer.dataset.user_id
    let chosenLocation = sessionStorage.getItem('location')

    if (sessionStorage.getItem('location') && sessionStorage.getItem('location') !== '') {
      infoLocationCart.classList.remove('empty')
      infoLocationCart.innerHTML = `<p>${sessionStorage.getItem('location')}</p>`
    } else {
      infoLocationCart.classList.add('empty')
      infoLocationCart.innerHTML = `<p>veillez ajouter votre address</p>`
    }

    destinationBtn.addEventListener('click', (e) => {
      e.preventDefault()
      modalLocation.classList.add('show')
      suggestionsSearchLocation()
    })

    const checkLocation = async (chosenLocation, user_id, _slashes) => {
      console.log(chosenLocation)
      if (window.location.toString().includes('cart')) {
        slashes = '../../../../'
      } else {
        slashes = '../../'
      }
      let data = await fetch(
        `${slashes}src/pages/ajax/cart.php?chosenLocation=${chosenLocation}&user_id=${user_id}`,
        {
          method: 'GET',
        }
      )

      let response = await data.text()

      console.log(response)
      // console.log(response)
      if (response === 'false') {
        console.log('not in your city bro !!!')
        sessionStorage.setItem('checkLocation', 'false')
      } else {
        sessionStorage.setItem('checkLocation', 'true')
      }
      if (
        sessionStorage.getItem('checkLocation') === 'false' &&
        chosenLocation !== null
      ) {
        let height = alertContainer.offsetHeight
        alertContainer.style.display = 'block'
        alertText.innerHTML = `Ce styliste ne travaille pas au <strong>${chosenLocation}</strong>`
        alertbutton.value = `trouvez un coiffeur a ${chosenLocation} adress`
        window.scrollTo(height, 0)
      } else {
        alertContainer.style.display = 'none'
      }
    }

    checkLocation(chosenLocation, user_id, slashes)

    locationList.addEventListener('click', async (e) => {
      if (e.target.hasAttribute('data-location')) {
        let location = e.target.dataset.location

        if (infoLocationCart) {
          sessionStorage.setItem('location', location)
          infoLocationCart.innerHTML = `<p>${location}</p>`
          // console.log(infoLocationCart)
          modalLocation.classList.remove('show')
          checkLocation(location, user_id)
        }
      }
    })
  }
  // on submit cart in stylist page
  if (cartForm) {
    // console.log(cartContainer.dataset.services_count)

    const modalTextContainer = document.querySelector('#modal-danger .content')
    const modalHeader = document.querySelector('#modal-danger header span')
    const closeBtn = document.querySelector('#modal-danger .close')
    console.log(sessionStorage.getItem('checkLocation'))
    console.log(cartContainer.dataset.services_count)
    cartForm.addEventListener('submit', (e) => {
      e.preventDefault()
      // ceheck if location and services are filled

      if (
        sessionStorage.getItem('location') &&
        sessionStorage.getItem('location') !== '' &&
        cartContainer.dataset.services_count > 0
      ) {
        //  if location and services are filled check if location corresponds to the user location

        if (sessionStorage.getItem('checkLocation') === 'false') {
          modalAlert.style.display = 'block'

          modalTextContainer.innerHTML = `<p>
          Ce coiffeur ne se trouve pas dans l'emplacement soumis,
          veillez chercher un autre coiffeur qui est a cette adresse ou bien changer d'emplacement
          </p>`
          console.log('ok')
          return
        }

        cartForm.submit()
      } else {
        // if location or services are not filled
        modalAlert.style.display = 'block'
        if (cartContainer.dataset.services_count < 1) {
          modalHeader.innerHTML = `     
        <i class="fa-solid fa-circle-exclamation"></i> Espace services
          `
          modalTextContainer.innerHTML = `<p>
          s'il vous plait veillez choisir au moins un service
          </p>`
          return
        }
        modalTextContainer.innerHTML = `<p>
      s'il vous plait veillez entrez votre emplacement
      pour que nous puissions vous mettre en contact avec les meilleur coiffeur de votre region
      </p>`
      }
    })
    closeBtn.addEventListener('click', (e) => {
      modalAlert.style.display = 'none'
    })
  }
}
