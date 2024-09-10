/* eslint-disable react-hooks/exhaustive-deps */
import { CURRENCY } from '@/config';
import { ArticleType, stripeType } from '@/types';
import { formatAmountForStripe } from '@/utils/stripe-helpers';
import React, { createContext, useContext, useState, useEffect } from 'react';
import toast from 'react-hot-toast';



export type DataContextType = {
    session:string, setSession:React.Dispatch<React.SetStateAction<string>>,
    getStripeData:() => stripeType[],
        cart: CartItem[];
    addCartItem: (article: ArticleType, quantity: number) => void;
    removeCartItem: (id: string) => void;
    emptyCart: () => void;
    removeOneItem: (id:string) => void;

};


export interface CartItem extends ArticleType {
    quantity: number;
  }

export const DataContext = createContext<DataContextType>({} as DataContextType);



export const DataProvider = (props: { children: React.ReactNode }) => {

    const [session, setSession] = useState('');
 

    const [cart, setCart] = useState<CartItem[]>(() => {
      if (typeof window !== 'undefined') {
        const savedCart = localStorage.getItem('cart');
        return savedCart ? JSON.parse(savedCart) : [];
      }
      return [];
    });
  
    useEffect(() => {
      if (typeof window !== 'undefined') {
        localStorage.setItem('cart', JSON.stringify(cart));
      }
     

     

    }, [cart]);

    const getStripeData=() =>{
      let stripe:stripeType[] =[];
      cart.forEach((element)=>{
        console.log(element)
        stripe.push({quantity:element.quantity,price_data:{currency:CURRENCY,product:element.stripeid,unit_amount:formatAmountForStripe(
          element.price,
          CURRENCY,
        )}})
      })

      console.log(stripe,"stripe")

      return stripe
    }


    const addCartItem = (article: ArticleType, quantity: number): void => {
       setCart((prevCart) => {
        const existingItem = prevCart.find(item => item.id === article.id);
        const currentQuantity = existingItem ? existingItem.quantity : 0;
        const newTotalQuantity = currentQuantity + quantity;
  
        if (newTotalQuantity > article.amount) {
          toast.error(`Cannot add ${quantity} items. Only ${article.amount - currentQuantity} available.`);
          return prevCart; 
        }

        if (existingItem) {
          return prevCart.map(item =>
            item.id === article.id
              ? { ...item, quantity: newTotalQuantity }
              : item
          );
        } else {

          return [...prevCart, { ...article, quantity }];
        }
      });
    };

  const removeCartItem = (id: string) => {
    setCart((prevCart) => prevCart.filter(item => item.id !== id));
  };


  const removeOneItem = (id:string) => {
    setCart((prevCart)=> prevCart.map((element)=>{
      if(element.id==id){
        return (
          {...element,quantity:element.quantity-1}
        )
      }else{
        return element
      }
     
    }))
  }

  const emptyCart = () => {
    setCart([]);
  };

  useEffect(()=>{

  })

  console.log(cart)
    return (
        <DataContext.Provider value={{
          getStripeData,
          removeOneItem,
        session, setSession,
         cart,
        addCartItem,
        removeCartItem,
        emptyCart
        }}>{props.children}</DataContext.Provider>
    );
    };
