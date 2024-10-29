function getCoordinateUser(position) {
  const { latitude, longitude } = position.coords;
  return { latitude, longitude };
}

function getCoordinateUserError(error) {
  console.error(error);
}

navigator.geolocation.getCurrentPosition(
  getCoordinateUser,
  getCoordinateUserError
);
