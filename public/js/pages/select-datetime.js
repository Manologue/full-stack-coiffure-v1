const date1 = new Date()
// We initialize a past date
// const date2 = new Date('2018-04-07 12:30:00');

const selectedDate = document.querySelector('#selected-date')
const selectedTime = document.querySelector('#selected-time')
const picker = document.querySelector('#picker')

const dangerAlert = document.querySelector('.modal-overlay#modal-danger')

const headerAlert = document.querySelector('.modal-overlay#modal-danger header > span')
const headerContent = document.querySelector('.modal-overlay#modal-danger .content')
const closeBtnAlert = document.querySelector('.modal-overlay#modal-danger .close')

// if (selectedDate.value !== undefined && selectedTime.value !== undefined) {
//   console.log('you entered something my brother')
// } else {
//   console.log('empty my brother')
// }
if (picker) {
  picker.addEventListener('click', (e) => {
    if (e.target && e.target.matches('#picker .myc-available-time')) {
      let time = e.target.dataset.time
      let date = e.target.dataset.date

      const date2 = new Date(`${date} ${time}:00`)

      // console.log(date2)

      if (date2 < date1) {
        // console.log('Ce temps est déjà obscellete veuillez choisir un autre.')
        dangerAlert.style.display = 'block'
        headerAlert.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i> Expirée`
        headerContent.innerHTML = `<p>
       Ce temps est déjà obscellete veuillez choisir un autre.
   </p>`
        return
      }
    }
  })

  closeBtnAlert.addEventListener('click', () => {
    dangerAlert.style.display = 'none'
    console.log('ok to close')
  })
}
