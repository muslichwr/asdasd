const names = document.querySelector(".names")
const email = document.querySelector(".email")
const joined = document.querySelector(".joined")
const names1 = document.querySelector(".names1")
const email1 = document.querySelector(".email1")
const joined1 = document.querySelector(".joined1")
const navBar = document.querySelector("nav")
const navToggle = document.querySelector(".navToggle")
const navLinks = document.querySelectorAll(".navList")
const darkToggle = document.querySelector(".darkToggle")
const body = document.querySelector("body")
const inputFields = document.querySelectorAll('.percentage p');

navToggle.addEventListener('click',()=>{
    navBar.classList.toggle('close')
})

navLinks.forEach(function (element){
    element.addEventListener('click',function (){
        navLinks.forEach((e)=>{
            e.classList.remove('active')
            this.classList.add('active')
        })
    })
})


darkToggle.addEventListener('click',()=>{
    body.classList.toggle('dark')
})


const fetchedData = fetch("./data.json")
                    .then((data)=>{
                        return data.json()
                    })
                    .then(response=>{
                        console.log(response);
                        const items = response.item
                        let Name = ""
                        let Email = ""
                        let Joined = ""
                        
                        items.forEach((element)=>{
                            Name += `<th class="data-title">${element.name}<th>`
                            Email += `<th class="data-title">${element.email}</th>`
                            Joined += `<th class="data-title">${element.joined}</th>`
                        })
                        names.innerHTML += Name 
                        email.innerHTML += Email 
                        joined.innerHTML += Joined 
                    })



const toggle = document.querySelector(".toggle"),
              input = document.querySelector("input");
              toggle.addEventListener("click", () =>{
                  if(input.type ==="password"){
                    input.type = "text";
                    toggle.classList.replace("uil-eye-slash", "uil-eye");
                  }else{
                    input.type = "password";
                  }
              })