import { useState, useEffect } from 'react'

function List({ todos, setTodos, hide, setHide }) {
    const [filteredTodo, setFilteredTodo] = useState([]);


    const isChecked = (e) => {
        let modifiedTodo = todos.map((todo, i) => {
            if (e.target.id == i) {
                return { ...todo, isDone: !todo.isDone };
            }
            return todo;
        })
        setTodos(modifiedTodo);
    }

    const isDone = (e) => {
        return e.isDone ? 'completed' : ''
    }

    const todoDelete = (e) => {
        let deletedTodo = todos.filter((todo, i) => {
            return e.target.id != i;
        });
        setTodos(deletedTodo);
    }

    useEffect(() => {
        switch (hide) {
            case 'Completed':
                setFilteredTodo(todos.filter(todo => todo.isDone == true));
                break;

            case 'Active':
                setFilteredTodo(todos.filter(todo => todo.isDone == false));
                break;

            default:
                setFilteredTodo(todos);
                break;
        }

    }, [hide, todos])

    const handleOnChange = (e) => {
        console.log(e.target.id);
    };

    return (
        <div className="main">
            <input className="toggle-all" type="checkbox" />
            <label htmlFor="toggle-all">Mark all as complete</label>

            <ul className='todo-list'>
                {filteredTodo.map((todo, i) =>
                    <li key={i} className={isDone(todo)} >
                        <div className="view" >
                            <input className="toggle" type="checkbox" onChange={handleOnChange} checked={todo.isDone ? 'checked' : ''} id={i} onClick={isChecked} />
                            <label>{todo.task}</label>
                            <button className="destroy" id={i} onClick={todoDelete}></button>
                        </div>
                    </li >
                )
                }
            </ul >
        </div >

    )
}

export default List