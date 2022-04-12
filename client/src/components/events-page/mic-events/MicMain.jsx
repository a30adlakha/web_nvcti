import React,{useState,useEffect, Fragment, Suspense} from "react";
import Events from "../event";
// import Loading from "../components/common/Loading";
import Event from "../event";
import { Col } from "react-bootstrap";

const url='http://127.0.0.1:8000/api/micList';

function FlagshipMain(){

    const [tours,setTours]= useState([]);
    const fetchTours= async () =>{
        try {
        const response=await fetch(url);
        const tours= await response.json();
        setTours(tours);
        console.log(tours);
            
        } catch (error) {
            console.log(`error: ${error}`);
        }

    };
    useEffect(()=>{
        fetchTours();
    },[]);

    return (
        
           <Fragment>
          
          <Col className="justify-align-center">
              <h1 className="display-3">MIC Events</h1>
            </Col>
           
            <Event events={tours} />
           
          
           </Fragment >
        
    );
}

export default FlagshipMain;