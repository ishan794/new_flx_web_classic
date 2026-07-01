fetch('https://flxware-7ikyrotwg-hasidu-s-projects.vercel.app/')
  .then(res => res.text())
  .then(text => {
    const links = text.match(/<link[^>]*>/g);
    console.log(links);
  });
