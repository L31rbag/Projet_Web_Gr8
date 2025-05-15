function create(tag, container, text=null) {
    const element = document.createElement(tag)
    if (text)
        element.innerText = text
    container.appendChild(element)
    return element
}

const resContainer = document.querySelector(".tbody");
const dateContainer = document.querySelector("#date");

const date_tri = new Date();

const avancer = document.getElementById("jourplus");
const reculer = document.getElementById("jourmoins");
avancer.addEventListener("click",avancer_date);
reculer.addEventListener("click",reculer_date);

function reculer_date(){
    //console.log(0)
    date_tri.setTime(date_tri.getTime()-86400*1000);
    //console.log(date_tri);
    clean_tr();
    clean_p_date();
    afficher_date();
    afficher_reservation();
}
function avancer_date(){
    //console.log(1)
    //console.log(date_tri)
    date_tri.setTime(date_tri.getTime()+86400*1000);
    //console.log(date_tri);
    clean_tr();
    clean_p_date();
    afficher_date();
    afficher_reservation();
}

function clean_p_date(){
    if(document.querySelector("#date_actu")){
        let p = document.querySelector("#date_actu");
        p.remove();}
}

function quel_mois(num_mois){
    let res ="";
    if(num_mois==1){res="Janvier"}
    else if(num_mois==2){res="Février"}
    else if(num_mois==3){res="Mars"}
    else if(num_mois==4){res="Avril"}
    else if(num_mois==5){res="Mai"}
    else if(num_mois==6){res="Juin"}
    else if(num_mois==7){res="Juillet"}
    else if(num_mois==8){res="Aout"}
    else if(num_mois==9){res="Septembre"}
    else if(num_mois==10){res="Octobre"}
    else if(num_mois==11){res="Novembre"}
    else {res="Décembre"}
    return res;
}
function afficher_date(){
    let p = create("p", dateContainer,date_tri.getDate() + " / " + quel_mois(date_tri.getMonth()+1) + " / " + date_tri.getFullYear());
    p.id = "date_actu"; 
}


function clean_tr(){
    while(document.querySelector(".res")){
    let tr = document.querySelector(".res");
    tr.remove();}
}
afficher_reservation();
afficher_date();
//console.log(10);

function afficher_reservation(){

    axios.get("../src/crud/crud.php").then( response => {
        response.data.forEach( res => {
            console.log(res);
            let res_jour= res.date[8] + res.date[9]
            let res_annee= res.date[0]+res.date[1]+res.date[2]+res.date[3]
            let res_mois= res.date[5]+res.date[6]
            res_mois = parseInt(res_mois)


            if(date_tri.getDate()==res_jour && date_tri.getFullYear()==res_annee && date_tri.getMonth()+1==res_mois){
                let tr = create("tr", resContainer)
                tr.classList.add("res")

                let id = create("td", tr, res.id)  
                id.classList.add("id")

                let nom = create("td", tr, res.nom)
                nom.classList.add("nom")

                let telephone = create("td", tr, res.telephone)  
                telephone.classList.add("telephone")

                let email = create("td", tr, res.email)  
                email.classList.add("email")

                let nbPersonne = create("td", tr, res.nbPersonne)  
                nbPersonne.classList.add("nbPersonne")

                let date = create("td", tr, res.date)  
                date.classList.add("date")

                let service = create("td", tr, service_text(res.service))  
                service.classList.add("service")

                let message = create("td", tr, res.message)  
                message.classList.add("message")
            }
        })
    })
}

function service_text(service){
    let res = "Midi";
    if(service=="1")
    {
        res = "Soir";
    }
    return res;
}

