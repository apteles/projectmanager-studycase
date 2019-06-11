import React from 'react'
import {Link} from 'react-router-dom'

import './style.css'

const Header = ({brand,navbarStyle}) => (

    <nav className={`navbar navbar-${navbarStyle}`}>
    <div className="container-fluid">
        <div className="navbar-header">
            <Link className="navbar-brand" to="/">{brand}</Link>
        </div>

    <div className="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul className="nav navbar-nav">
            <li className="active"><a href="#">Link <span className="sr-only">(current)</span></a></li>
        </ul>
        
        <ul className="nav navbar-nav navbar-right">
            <li>
                <Link to="/login" >Login</Link>
            </li>
            <li>
            <Link to="/register" >Register</Link>
            </li>
        </ul>
    </div>
    </div>
    </nav>
)

export default Header