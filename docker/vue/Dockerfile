# develop stage
FROM node:11.1-alpine as develop-stage
WORKDIR /app
COPY ../../frontend/package*.json ./
RUN yarn install
COPY ../../frontend .
FROM develop-stage as build-stage
RUN yarn build# production stage
FROM nginx:1.15.7-alpine as produ
ction-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]