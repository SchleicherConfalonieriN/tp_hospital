
const btn_M=document.getElementById('btn_medico');
const btn_E=document.getElementById('btn_estudio');
const btn_T=document.getElementById('btn_turno');

const menu_M=document.getElementById('Admin_Medico');
const menu_E=document.getElementById('Admin_Estudio');
const menu_T=document.getElementById('Admin_Turno');

const add_medico=document.getElementById('reg_medico');
const tip = document.querySelectorAll('input[name="gr1"]');

tip[0].addEventListener("change",registro_admin);
tip[1].addEventListener("change",registro_medico);
btn_M.addEventListener("click",menu_medico);
btn_E.addEventListener("click",menu_estudio);
btn_T.addEventListener("click",menu_turno);

function registro_medico(){
add_medico.style.display="flex";
add_medico.style.flexDirection= "column";
	}

function registro_admin(){
add_medico.style.display="none";
	}



function menu_medico(){
if(menu_M.style.display=="none"){
menu_M.style.display="flex";
}else{
menu_M.style.display="none"	
}
}

function menu_estudio(){
if(menu_E.style.display=="none"){
menu_E.style.display="flex";
}else{
menu_E.style.display="none"	
}
}

function menu_turno(){
if(menu_T.style.display=="none"){
menu_T.style.display="flex";
}else{
menu_T.style.display="none"	
}
}



