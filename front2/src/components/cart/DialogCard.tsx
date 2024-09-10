/* eslint-disable @next/next/no-img-element */
import React, { useContext, useState } from 'react'
import { Card } from '../ui/card'
import { Button } from '../ui/button'
import { CartItem, DataContext } from '@/context/datacontext'
import toast from 'react-hot-toast'
import { Trash2 } from 'lucide-react'

const DialogCard = (item:CartItem) => {
    const [quantity,setQuantity] = useState(item.quantity)
    const {addCartItem,removeCartItem,removeOneItem} = useContext(DataContext)

    function addQuantity(){
        console.log("here we add",quantity,item.amount)

        if(quantity<item.amount){
            setQuantity(quantity=>quantity+1)
            addCartItem(item,1)

        }else{
            toast.error("Maximun amount!")
        }
    }   
     
    function removeQuantity(){
        if(quantity>1){
            setQuantity(quantity=>quantity-1)
            removeOneItem(item.id)
        }else{
            removeCartItem(item.id)
        }
    }

  return (
    <Card className="flex items-center relative p-4 space-x-4">
        <Trash2 onClick={()=>{removeCartItem(item.id)}} className="w-4 h-4 cursor-pointer absolute top-2 left-2" />

        <div className="relative">
            <img
                src={item.pp}
                alt={item.caractéristique}
                width="50"
                height="50"
                className="w-16 h-16 rounded-md"
                style={{ aspectRatio: "50/50", objectFit: "cover" }}
            />
        </div>
        <div className="flex-1">
        <div className="flex justify-between">
            <h3 className="text-xs font-medium">{item.name}</h3>
            {/* <p className="text-xs text-muted-foreground">White / S</p> */}
            </div>
            {item.reduction ? <span className='text-red-600 font-bold'>Reduction</span>:null}
            <div className="text-sm font-medium">{(item.price * ((100-item.reduction)/100)) * quantity} $ USD</div>
      </div>
        <div className="flex items-center space-x-2">
            <Button onClick={removeQuantity} variant="outline" size="icon">
                -
            </Button>
            <span className="text-sm">{quantity}</span>
            <Button onClick={addQuantity} variant="outline" size="icon">
                +
            </Button>
        </div>
  </Card>
)
}

function XIcon(props:any) {
return (
  <svg
    {...props}
    xmlns="http://www.w3.org/2000/svg"
    width="24"
    height="24"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    strokeWidth="2"
    strokeLinecap="round"
    strokeLinejoin="round"
  >
    <path d="M18 6 6 18" />
    <path d="m6 6 12 12" />
  </svg>
)
}


export default DialogCard
