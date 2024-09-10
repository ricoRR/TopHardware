"use server";

import type { Stripe } from "stripe";

import { headers } from "next/headers";

import { CURRENCY } from "@/config";
import { formatAmountForStripe } from "@/utils/stripe-helpers";
import { stripe } from "@/lib/stripe";
import { stripeType } from "@/types";

export async function createCheckoutSession(
  data: stripeType[],ui_mode:Stripe.Checkout.SessionCreateParams.UiMode
): Promise<{ client_secret: string | null; url: string | null }> {

  const origin: string = headers().get("origin") as string;

  const checkoutSession: Stripe.Checkout.Session =
    await stripe.checkout.sessions.create({
      mode: "payment",
      line_items:  data,
      ...(ui_mode === "hosted" && {
        success_url: `${origin}/result?session_id={CHECKOUT_SESSION_ID}`,
        cancel_url: `${origin}/dashboard`,
      }),
      ...(ui_mode === "embedded" && {
        return_url: `${origin}/result?session_id={CHECKOUT_SESSION_ID}`,
      }),
    });

  return {
    client_secret: checkoutSession.client_secret,
    url: checkoutSession.url,
  };
}

export async function createPaymentIntent(
  data: FormData,
): Promise<{ client_secret: string }> {
  const paymentIntent: Stripe.PaymentIntent =
    await stripe.paymentIntents.create({
      amount: formatAmountForStripe(
        Number(data.get("customDonation") as string),
        CURRENCY,
      ),
      automatic_payment_methods: { enabled: true },
      currency: CURRENCY,
    });

  return { client_secret: paymentIntent.client_secret as string };
}