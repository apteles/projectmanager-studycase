import React from 'react'
import {Route} from 'react-router-dom'

import TestRedirect from '../operator/TestRedirect'
import {isAuthenticated} from '../../services/auth'

const PrivateRoute = ({component: Component, ...rest}) => {
    
    return (
        <Route
            {...rest}
            render={props =>
                    <TestRedirect if={isAuthenticated()}>
                        <Component {...props} />
                    </TestRedirect>
            }
        />
    )
}

export default PrivateRoute