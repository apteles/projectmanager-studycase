import React from 'react'

const Panel = ({children,panel,title}) => {

    return (
        <div className={`panel panel-${panel}`}>
            <div className="panel-heading">
                <h3 className="panel-title">{title}</h3>
            </div>
            <div className="panel-body">
                {children}
            </div>
        </div>
    )
}

export default Panel