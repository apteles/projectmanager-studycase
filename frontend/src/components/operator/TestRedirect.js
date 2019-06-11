import React from 'react'
import {Redirect} from 'react-router-dom'

const TestRedirect = (props) => {

    if(props.if){
        return (
            props.children
        )
    } 
    return ( <Redirect to={ {pathname: '/', state:{from: props.location}} }  />)
}

export default TestRedirect