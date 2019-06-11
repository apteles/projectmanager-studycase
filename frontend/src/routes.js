import React from 'react'
import {BrowserRouter,Route, Switch} from 'react-router-dom'

import PrivateRoute from './components/route/privateRoute'
import Header from './layouts/header'

import Home from './pages/home'
import Clients from './pages/client'
import ClientsEdit from './pages/client/edit'

const Routes = () => (
    <BrowserRouter>
        <Header brand="Project Manger" navbarStyle="inverse"/>
        <Switch>
            <Route exact path="/" component={Home} />
            <PrivateRoute exact path="/clients" component={Clients} />
            <PrivateRoute exact path="/clients/edit/:id" component={ClientsEdit} /> 
        </Switch>
    </BrowserRouter>
)

export default Routes

