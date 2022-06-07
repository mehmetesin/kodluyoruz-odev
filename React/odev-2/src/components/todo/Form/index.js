import { useState } from 'react'

function Form({ todos, setTodos }) {
    const [newTodo, setNewTodo] = useState('')

    const onChangeInput = (e) => {
        setNewTodo(e.target.value);
    }

    const onSubmitForm = (e) => {
        e.preventDefault();
        if (newTodo.trim() == '') {
            return false;
        } else {
            setTodos([...todos, { task: newTodo, isDone: false }]);
            setNewTodo('');
        }
    }

    return (
        <form onSubmit={onSubmitForm}>
            <input className="new-todo" placeholder="What needs to be done?" onChange={onChangeInput} value={newTodo} />
        </form>
    )
}

export default Form