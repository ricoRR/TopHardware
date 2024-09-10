import { NextResponse } from 'next/server';
import type { NextRequest } from 'next/server';
import { jwtVerify,decodeJwt } from 'jose';
import { sessionType } from '@/types';

export async function middleware(request: NextRequest) {
  const session = request.cookies.get('session')?.value;

 

  if (!session) {
    return NextResponse.redirect(new URL('/auth', request.url));
  }

  try {
    const  payload  = await decodeJwt(session) as sessionType;

    const currentTimestamp = Math.floor(Date.now() / 1000);
    if (payload.exp && payload.exp < currentTimestamp) {
      const response = NextResponse.redirect(new URL('/auth', request.url));
      response.cookies.delete('session');
      return response;
    }

    if (request.url.startsWith('/admin')) {
      if (!payload.roles.includes('ROLE_USER')) {
        return NextResponse.redirect(new URL('/unauthorized', request.url));
      }
    }

    return NextResponse.next();
  } catch (error) {
    return NextResponse.redirect(new URL('/auth', request.url));
  }
}

export const config = {
  matcher: [
    /*
     * Match all request paths except for the ones starting with:
     * - api (API routes)
     * - _next/static (static files)
     * - _next/image (image optimization files)
     * - favicon.ico (favicon file)
     */
    '/admin',
  ],
}