/******* services page */

const servicesPage = document.querySelector('.services-page')

if (servicesPage) {
  // deleteBtn = servicesPage.querySelector('.delete-service-btn')
  deleteForms = servicesPage.querySelectorAll('.delete-form')

  deleteForms.forEach((form) => {
    form.addEventListener('submit', (e) => {
      // console.log('ok')
      e.preventDefault()
      const form = e.target

      const deleteBtn =
        form.parentElement.parentElement.parentElement.parentElement.querySelector(
          '.delete-service-btn'
        )
      deleteBtn.addEventListener('click', () => {
        form.submit()
      })
    })
  })
}

// const servicesPage = document.querySelector('.services-page')

// if (servicesPage) {
//   // deleteBtn = servicesPage.querySelector('.delete-service-btn')
//   deleteBtns = servicesPage.querySelectorAll('.delete-form-btn')

//   deleteBtns.forEach((btn) => {
//     btn.addEventListener('submit', (e) => {
//       e.preventDefault()
//       const btn = e.target
//       confirm('Are you sure you want to delete')
//     })
//   })
// }

/*****************************profile page */
const profilePage = document.querySelector('.profile-page')

if (profilePage) {
  const form = profilePage.querySelector('.form-profile')
  const fileInput = profilePage.querySelector('#profile-file')
  const closeIcon = profilePage.querySelector('.img-container-profile i')
  const image = profilePage.querySelector('#output')
  const filenameContainer = profilePage.querySelector('.filename-container')
  const alert = profilePage.querySelector('.profile-alert')
  // console.log(alert)

  fileInput.addEventListener('change', (e) => {
    image.style.display = 'block'
    image.src = URL.createObjectURL(e.target.files[0])
    let filename = getLastPathValue(e.target.files[0].name)
    console.log(filename)
    filenameContainer.textContent = filename
    closeIcon.style.display = 'block'
  })

  // closeIcon
  closeIcon.addEventListener('click', async () => {
    closeIcon.style.display = 'none'
    image.src = ''
    console.log(fileInput.value)
    fileInput.value = null
    // console.log(fileInput.files[0])
    image.style.display = 'none'
    filenameContainer.textContent = ''

    const data = await fetch(`../../src/pages/account/ajax/delete_profile_picture.php`, {
      method: 'GET',
    })
    const response = await data.text()
    console.log(response)
    if (response === 'true') {
      alert.classList.add('alert-success')
      alert.innerHTML = `picture removed successfully`
      setTimeout(() => {
        alert.classList.remove('alert-success')
        alert.innerHTML = ''
      }, 3000)
    }
  })

  function getLastPathValue(source) {
    source = source.replace(/^.*[\\\/]/, '')
    return source
  }

  window.addEventListener('DOMContentLoaded', () => {
    let image_file_name = getLastPathValue(image.src)
    console.log(image_file_name)
    if (image_file_name !== '' && image_file_name !== 'empty-profile.png') {
      closeIcon.style.display = 'block'
      filenameContainer.textContent = image_file_name
    } else {
      image.style.display = 'none'
      closeIcon.style.display = 'none'
    }
  })
}
