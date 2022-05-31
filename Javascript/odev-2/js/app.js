let todos = document.querySelector('#list'); // Todo listesi (ul)
let task = document.querySelector('#task'); // todo giriş input
let storageTodos =[]; //localstorage tutulacak todo lar için array
let todoObj = {} //localstorage tutulacak todo objesi

let toastLiveExample = document.getElementById('liveToast');
let toast = new bootstrap.Toast(toastLiveExample);

function newElement() {
    if (task.value.trim()) { // Eğer boş değilse
        addTodo(task.value.trim()); //todo ekle
        task.value = ''; // girişi boşalt
        task.focus(); // girişi aktifleştir
    }else{
        notify('false', 'Listeye boş ekleme yapamazsınız!');
    }
}

// todoları özelliklerine göre listele
function todosList() {
    localStorage.getItem('todos') ? storageTodos = JSON.parse(localStorage.getItem('todos')) : storageTodos = [];
    todos.innerHTML='';
    storageTodos.forEach((todo, index) => {
        let newTodo = document.createElement('li');
        newTodo.innerHTML = `${todo.todo} <span class="close" data-id="${index}">X</span>`;
        console.log(todo.isDone);
        if (todo.isDone == true) newTodo.classList.add('checked');
        todos.appendChild(newTodo);
    });
}

// todo ekle
function addTodo(todo) {
    todoObj.isDone = 'false';
    todoObj.todo = todo;
    storageTodos.push(todoObj);
    localStorage.setItem('todos', JSON.stringify(storageTodos));
    todosList();
    notify(true, 'Listeye eklendi.');
}

// todo sil
function deleteTodo(todo) {
    let id = todo.getAttribute('data-id')
    console.log(id)
    storageTodos.splice(id,1);
    localStorage.setItem('todos', JSON.stringify(storageTodos));
    todosList();
    notify(false, 'Listeden çıkarıldı');
}

// todo yapıldı
function doneTodo(todo) {
    let id = todo.querySelector('.close').getAttribute('data-id')
    // console.log(id);
    storageTodos[id].isDone = storageTodos[id].isDone == true ? false : true;
    localStorage.setItem('todos', JSON.stringify(storageTodos));
    todo.classList.toggle('checked');
    false
}

// Toast özelleştirmesi
function notify(state, mesaj) {
    let toastDiv = document.querySelector('#liveToast');
    document.querySelector('.toast-body').innerHTML=mesaj;
    toast.show();
    
    if (state==true){
        // 'Listeye eklendi.'
        toastDiv.classList.remove('bg-danger');
        toastDiv.classList.add('bg-success');
        toastDiv.classList.add('text-white');
    }else{
        toastDiv.classList.remove('bg-success');
        toastDiv.classList.add('bg-danger');
        toastDiv.classList.add('text-white');
    }
}
// yapıldı ve silme için todo tıklamaları kontrolü
todos.addEventListener('click', (e) => {
    if (e.target.tagName === 'LI') {
        doneTodo(e.target)
    }
    if (e.target.className === 'close') {
        deleteTodo(e.target)
    }
});

// girişte enter tuşu kontrolü
task.addEventListener('keypress', (e)=>{
    if (e.key=='Enter') {
        newElement();
    }
})

todosList();


