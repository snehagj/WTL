import React, { useState } from 'react';
import './App.css';

function App() {
  const [students, setStudents] = useState([]);
  const [newStudent, setNewStudent] = useState('');

  const handleAddStudent = () => {
    if (newStudent.trim() !== '') {
      setStudents([...students, newStudent]);
      setNewStudent('');
    }
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1>Student Register</h1>
        <div>
          <input
            type="text"
            placeholder="Enter student name"
            value={newStudent}
            onChange={(e) => setNewStudent(e.target.value)}
          />
          <button onClick={handleAddStudent}>Register Student</button>
        </div>
        <h2>Registered Students</h2>
        <ul>
          {students.map((student, index) => (
            <li key={index}>{student}</li>
          ))}
        </ul>
      </header>
    </div>
  );
}

export default App;