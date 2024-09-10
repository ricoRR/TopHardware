import type { Stripe } from "stripe";

import { NextResponse } from "next/server";

import { stripe } from "@/lib/stripe";

export async function POST(req: Request) {
  let event: Stripe.Event;

  try {
    event = stripe.webhooks.constructEvent(
      await (await req.blob()).text(),
      req.headers.get("stripe-signature") as string,
      process.env.NEXT_PUBLIC_STRIPE_WEBHOOK as string,
    );
  } catch (err) {
    const errorMessage = err instanceof Error ? err.message : "Unknown error";
    // On error, log and return the error message.
    if (err! instanceof Error) console.log(err);
    console.log(`❌ Error message: ${errorMessage}`);
    return NextResponse.json(
      { message: `Webhook Error: ${errorMessage}` },
      { status: 400 },
    );
  }

  // Successfully constructed event.
  console.log("✅ Success:", event.id);

  const permittedEvents: string[] = [
    "checkout.session.completed",
    "payment_intent.succeeded",
    "payment_intent.payment_failed",
  ];

  if (permittedEvents.includes(event.type)) {
    let data;

    try {
      switch (event.type) {
        case "checkout.session.completed":
          data = event.data.object as Stripe.Checkout.Session;
          console.log(data.customer_details?.email)


          let user;
          const session = await stripe.checkout.sessions.retrieve(
              data.id,
              {
                  expand: ['line_items']
              }
          );



          const idPrice = session.line_items?.data[0]?.price?.id
    
    
     
    
          if (!data.customer_details?.email) {
            console.error("No receipt email found in the payment intent data");
            return;
          }

          // if(idPrice=='price_1Pc8BeEPu5RF5joOBq1eTTpI'){
          //   await prisma.user.update({
          //     data: {
          //       tokenBalance: {
          //         increment: 50
          //       }
          //     },
          //     where: {
          //       mail: data.customer_details?.email
          //     }
          //   });
          // }else if (idPrice=='price_1Pc8BJEPu5RF5joOz8vKzL7l'){
          //   // 15 dollars
          //   await prisma.user.update({
          //     data: {
          //       tokenBalance: {
          //         increment: 25
          //       }
          //     },
          //     where: {
          //       mail: data.customer_details?.email
          //     }
          //   });
          // }else if(idPrice=='price_1PgnESEPu5RF5joOeOH0fXN9'){
          //               // 8 dollars

          //   await prisma.user.update({
          //     data: {
          //       tokenBalance: {
          //         increment: 10
          //       }
          //     },
          //     where: {
          //       mail: data.customer_details?.email
          //     }
          //   });
          // }
        

         
          console.log(`💰 CheckoutSession status: ${data.payment_status}`);
          break;
        case "payment_intent.payment_failed":
          data = event.data.object as Stripe.PaymentIntent;
          console.log(`❌ Payment failed: ${data.last_payment_error?.message}`);
          break;
        case "payment_intent.succeeded":
          data = event.data.object as Stripe.PaymentIntent;
          
       
          console.log(`💰 PaymentIntent status: ${data.status}`);
          break;
        default:
          throw new Error(`Unhandled event: ${event.type}`);
      }
    } catch (error) {
      console.log(error);
      return NextResponse.json(
        { message: "Webhook handler failed" },
        { status: 500 },
      );
    }
  }
  // Return a response to acknowledge receipt of the event.
  return NextResponse.json({ message: "Received" }, { status: 200 });
}