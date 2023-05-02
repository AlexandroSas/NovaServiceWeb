let sources = document.querySelectorAll(".source");
let targets = document.querySelectorAll(".target");



for(let i=0; i<sources.length; i++){
    sources[i].addEventListener('dragstart', (e)=>{
        e.dataTransfer.setData('text/plain', e.target.id);
    });
    
    if(sources[i].classList[1] == 0){sources[i].children[0].children[2].children[1].children[0].children[0].style.color="goldenrod";}
    if(sources[i].classList[1] == 1){sources[i].children[0].children[2].children[1].children[1].children[0].style.color="limegreen";}
    if(sources[i].classList[1] == 2){sources[i].children[0].children[2].children[1].children[2].children[0].style.color="crimson";}
}

for(let j=0; j<targets.length; j++){
    for(let z=0; z<sources.length; z++){
        if(sources[z].classList[1] == j){
            targets[j].appendChild(sources[z])
        }
    }

    targets[j].addEventListener('dragover', (e)=>{
        e.preventDefault();
    });

    targets[j].addEventListener('drop', (e)=>{
        e.preventDefault();
        const sourceID = e.dataTransfer.getData('text/plain');
        const source = document.getElementById(sourceID);
        source.classList.replace(source.classList[1],j);
        e.target.appendChild(source);
    });            
}