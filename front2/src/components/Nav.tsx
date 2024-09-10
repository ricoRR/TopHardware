"use client";
import { ChevronsDown, Github, Mailbox, Menu } from "lucide-react";
import React, { useContext, useEffect, useState } from "react";
import {
  Sheet,
  SheetContent,
  SheetFooter,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "./ui/sheet";
import { Separator } from "./ui/separator";
import { Button } from "./ui/button";
import Link from "next/link";
import Image from "next/image";
import { getSession, logout } from "@/utils/login";
import { sessionType, stripeType } from "@/types";
import { ShoppingCart } from 'lucide-react';
import { CartItem, DataContext } from "@/context/datacontext";
import DialogCard from "./cart/DialogCard";
import Stripe from "stripe";
import { createCheckoutSession } from "./actions/stripe";

interface RouteProps {
  href: string;
  label: string;
}

interface FeatureProps {
  title: string;
  description: string;
}

const routeList: RouteProps[] = [

  {
    href: "#features",
    label: "Features",
  },
  {
    href: "#contact",
    label: "Pricing",
  },
  {
    href: "#faq",
    label: "FAQ",
  },
];


export const Nav = () => {

  const [isOpen, setIsOpen] = useState(false);
  const [session, setSession] = useState<sessionType|null>();
  const [total, setTotal] = useState<number>(0);
  const {cart,getStripeData} =  useContext(DataContext)

  const [clientSecret, setClientSecret] = useState<string | null>(null);

  const formAction = async (data: stripeType[],uiMode:Stripe.Checkout.SessionCreateParams.UiMode): Promise<void> => {

    const { client_secret, url } = await createCheckoutSession(data,uiMode);

    if (uiMode === "embedded") return setClientSecret(client_secret);

    window.location.assign(url as string);
  };

  useEffect(() => {
    const fetchSession = async () => {
      const response = await getSession() ;
  
      if(response){
        setSession(response);

      }
    };

    fetchSession();
  }, []);

  


  const handleLogout = async () => {
    await logout()
    setSession(null);
  };




  useEffect(()=>{
    let total=0;
    cart.forEach((element)=>{
      if(element.reduction){
        total += element.price * ((100-element.reduction)/100)* element.quantity
      }else{
        total+=element.price*element.quantity
      }
    })
    setTotal(total)
  },[cart])


  let stripe =getStripeData() 
  console.log(cart,"cart")
  console.log(stripe,"stripe")

  return (
    <header className="shadow-inner bg-opacity-15 w-[90%] mt-4 md:w-[70%] lg:w-[75%] lg:max-w-screen-xl top-5 mx-auto  border border-secondary z-40 rounded-2xl flex justify-between items-center p-2 bg-card">
      <Link href="/" className="font-bold tet-lg gap-2 flex items-center">
      <Image
            src={'/top.png' }                    
            alt="top-harware-logo"
            height={40}
            width={120}
        />
      </Link>
      <div className="flex items-center lg:hidden">
        <Sheet open={isOpen} onOpenChange={setIsOpen}>
          <SheetTrigger asChild>
            <Menu
              onClick={() => setIsOpen(!isOpen)}
              className="cursor-pointer lg:hidden"
            />
          </SheetTrigger>

          <SheetContent
            side="left"
            className="flex flex-col justify-between rounded-tr-2xl rounded-br-2xl bg-card border-secondary"
          >
            <div>
              <SheetHeader className="mb-4 ml-4">
                <SheetTitle className="flex items-center">
                  <Link href="/" className="flex items-center">
                    <ChevronsDown className="bg-gradient-to-tr border-secondary from-primary via-primary/70 to-primary rounded-lg w-9 h-9 mr-2 border text-white" />
                    Shadcn
                  </Link>
                </SheetTitle>
              </SheetHeader>

              <div className="flex flex-col gap-2">
                {routeList.map(({ href, label }) => (
                  <Button
                    key={href}
                    onClick={() => setIsOpen(false)}
                    asChild
                    variant="ghost"
                    className="justify-start text-base"
                  >
                    <Link href={href}>{label}</Link>
                  </Button>
                ))}
              </div>
            </div>

            <SheetFooter className="flex-col sm:flex-col justify-start items-start">
              <Separator className="mb-2" />

            </SheetFooter>
          </SheetContent>
        </Sheet>
      </div>

      {/* <NavigationMenu className="hidden lg:block mx-auto">
        <NavigationMenuList>
          

          <NavigationMenuItem>
            {routeList.map(({ href, label }) => (
              <NavigationMenuLink key={href} asChild>
                <Link href={href} className="text-base px-2">
                  {label}
                </Link>
              </NavigationMenuLink>
            ))}
          </NavigationMenuItem>
        </NavigationMenuList>
      </NavigationMenu> */}

      <div className="hidden items-center lg:flex gap-4">
          <Sheet>
            <SheetTrigger>
            <div className="relative h-10 w-10 flex justify-center items-center">
              <div className="absolute text-xs top-0 left-0 bg-yellow-200 p-1 rounded-full text-center">
                {cart.reduce((current,element)=> current+ element.quantity ,0)}
              </div>
              
              <ShoppingCart className="cursor-pointer" />

            </div>

            </SheetTrigger>
            <SheetContent className="flex flex-col justify-between">
              <SheetHeader>
                <SheetTitle>
                  Cart
                </SheetTitle>

                <>
              {cart &&
                cart.map((element:CartItem)=>{

                  return (
                    <DialogCard key={element.id} {...element} />

                  )
                })
              }
              </>
              </SheetHeader>
       


             <div className="flex flex-col gap-3">
                <div className="flex flex-row justify-between w-full">
                  <p className="text-gray-600">
                    Taxes
                  </p>
                  <span>
                    0,00 $ USD
                  </span>
                </div>
                <div className="flex flex-row justify-between w-full">
                  <p className="text-gray-600">
                    Shipping
                  </p>
                </div>
                <div className="flex flex-row justify-between w-full">
                  <p>
                    Total 
                  </p>
                  <span>
                    {total} $ USD
                  </span>
                </div>
                <form action={()=>{
                  let stripe =getStripeData() 
                  formAction(stripe,'hosted')}}>
                  <Button type="submit">
                    Proceed to Checkout

                    </Button>
                </form>
              
             </div>
            </SheetContent>
          </Sheet>

        {session ? (
            <Button size="sm" onClick={handleLogout} aria-label="Sign out">
              Sign out
            </Button>
          ) : (
            <Button asChild size="sm" aria-label="Sign in">
              <Link href="/auth">Sign in</Link>
            </Button>
          )}
      </div>
    </header>
  );
};
