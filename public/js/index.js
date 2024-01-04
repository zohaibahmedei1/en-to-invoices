console.log("Hello World!")

const fs = require('fs')

fs.readFile('/uploads/1704377193.xml',(err,data)=>{
    console.log(data)
})

