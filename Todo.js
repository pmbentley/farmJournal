import React, {useState,useEffect} from 'react';

function Todo(){
    const categories=['Work','Personal','Other'];

    const [todos, setTodos]=useState([]);
    const [task, setTask]=useState('');
    const [dueDate,setDueDate]=useState('');
    const [category,setCategory]=useState(categories[0]);
    const [editingIndex,setEditingIndex]=useState(null);
    const [editingText,setEditingText]=useState('');

    useEffect(() => {
        const savedTodos = JSON.parse(localStorage.getItem('todos')) || [];
        setTodos(savedTodos);
      }, []);
    
      useEffect(() => {
        localStorage.setItem('todos', JSON.stringify(todos));
      }, [todos]);

      const addTodo = () => {
        setTodos([...todos, { text: task, completed: false,dueDate:dueDate,category:category}]);
        setTask('');
        setDueDate('');
        setCategory(categories[0]);
      };

      const removeTodo = (index) => {
        const newTodos = [...todos];
        newTodos.splice(index, 1);
        setTodos(newTodos);
      };
      
      const startEditing=(index)=>{
        setEditingIndex(index);
        setEditingText(todos[index].text);
      };

      const handleEditChange=(e)=>{
        setEditingText(e.target.value);
      };

      const editTodo=(index)=>{
        if(editingText.trim() !== ''){
            const newTodos=[...todos];
            newTodos[index].text=editingText;
            setTodos(newTodos);
            setEditingIndex(null);setEditingText('');
        }
      };

      const toggleTodo = (index) => {
        const newTodos = [...todos];
        newTodos[index].completed = !newTodos[index].completed;
        setTodos(newTodos);
      };     

    return (
        <div>
            <h1>Todo List</h1>
            <input
            type='text'
            value={task}
            onChange={(e)=>setTask(e.target.value)}
            />
            <input
            type='date'
            value={dueDate}
            onChange={(e)=>setDueDate(e.target.value)}
            />

            <select value={category} onChange={(e)=>setCategory(e.target.value)}>
                {categories.map((cat)=>(
                    <option key={cat}value={cat}>
                        {cat}
                    </option>
                ))} 
            </select>
            <button onClick={addTodo}>Add Task</button>

            <ul>
        {todos.map((todo, index) => (
          <li key={index}>
            {editingIndex===index?(
                <>
                <input
                type='text'
                value={editingText}
                onChange={handleEditChange}
                />
                <button onClick={()=>editTodo(index)}>Save</button>
                <button onClick={()=>setEditingIndex(null)}>Cancel</button>
                </>
            ):(<></>)}
          <span
            onClick={() => toggleTodo(index)}
            style={{ textDecoration: todo.completed ? 'line-through' : 'none' }}
            >
                {todo.text}-Due:{todo.dueDate}-Category:{todo.category}
            {todo.text}-Due:{todo.dueDate}</span>
            <button onClick={()=>startEditing(index)}>Edit</button>
            <button onClick={()=>removeTodo(index)}>Delete</button>
          </li>
        ))}
      </ul>
        </div>
    );   
}
export default Todo;