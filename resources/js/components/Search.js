import React,{useState} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import Button from '@mui/material/Button';
import SendIcon from '@mui/icons-material/Send';
import TextField from '@mui/material/TextField';

function Example() {
    const [search,setSearch] = useState("")
const [studentData,setStudentData] = useState({})

    function handleChange({target}){
        const {name,value} = target 
        setSearch(value)
    }

    const handleClick=async(event)=>{
        var APICallString = "http://localhost:8000/api/students/"+search
    let resp = null
   await axios.get(APICallString,{validateStatus:false})
    .then(function(response){
        resp = response
        console.log(resp)
        setStudentData(response.data)
    })
}
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Certificate Search</div>

                        <div className="card-body">
                            <TextField helperText="Please enter Certificate Number" 
                            className="text_field"
                            type="text" 
                            label="Certificate Number"
                            id="demo-helper-text-aligned"
                            onChange={handleChange} 
                            value={search}
                            />
                            <Button 
                            variant="contained" 
                            size="large"
                            endIcon={<SendIcon />} 
                            onClick={e=>handleClick(e)}
                            >Search</Button>
                            
                        </div>

                    </div>
                    <div className="card">
                        {JSON.stringify(studentData.students)  && (
                        <div>
                        <p>Name: {studentData.students.name}</p>
                        <p>Certificate Number: {studentData.students.cert_no}</p>
                        </div>
                        )}
                        <p>{JSON.stringify(studentData.message)}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
